
import os
import json
import googleapiclient.discovery
from flask import Flask, render_template, request
import os
import json
import tensorflow as tf
import numpy as np
import pandas as pd
from tensorflow.keras.preprocessing.sequence import pad_sequences
import re
import joblib

app = Flask(__name__)
model = tf.keras.models.load_model('model_fix.h5')

tokenizer = joblib.load('token.pkl')

@app.route('/', methods=['GET'])
def homepage():
    return "FLASK BERHASIL DIJALANKAN"


###========================== ML MODEL PREDICTION  ==============================###
@app.route('/api/predict', methods=['POST'])
def predict():
    if request.headers['Content-Type'] == 'application/json':
        try:
            requestBody = request.json
            data_cleaned =[]
            data_output = []
            for i in range(len(requestBody)):
                temp = requestBody[i].lower()
                temp = re.sub(r'[^\w\s]', '', temp)
                temp = re.sub("\d+", "", temp)
                data_cleaned.append(temp)
            
            encode = tokenizer.texts_to_sequences(data_cleaned)
            seq = pad_sequences(encode, maxlen=120, padding='post', truncating='post')

            predictions = (model.predict(seq) > 0.5).astype("int32")
            # [[0 1] [1 0]]
            good = "[0 1]"
            print(predictions)
            for x in predictions:
                print(x)
                if str(x) == good:
                    data_output.append("good")
                else:
                    data_output.append("not good")

            responseBody = {'message': data_output}
            return responseBody, 200
        except Exception as e:
            return {'error': str(e)}, 400
    else:
        return {'error': 'Invalid Content-Type'}, 400


###==========================  YT GET COMMENT API  ==============================###
@app.route('/api/get_comment', methods=['POST'])
def get_comment():
    if request.headers['Content-Type'] == "text/plain":
        try:
            requestBody = request.get_data(as_text=True)
            os.environ["OAUTHLIB_INSECURE_TRANSPORT"] = "1"
            api_service_name = "youtube"
            api_version = "v3"

            VIDEO_ID = requestBody
            DEVELOPER_KEY = "AIzaSyDBx3L4nQPmsTFlS_B8fkM_W6xVb1zCPa0"

            youtube = googleapiclient.discovery.build(api_service_name, api_version, developerKey = DEVELOPER_KEY)
            requestt = youtube.commentThreads().list(part="snippet,replies",videoId=VIDEO_ID)
            response = requestt.execute()
            responseBody = {'message': response}
            return responseBody, 200
        except Exception as e:
            return {'error': str(e)}, 400
    else:
        return {'error': 'Invalid Content-Type'}, 400


if __name__ == '__main__':
    app.run(debug=True, host="0.0.0.0", port=int(os.environ.get("PORT", 8080)))