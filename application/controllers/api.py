import requests
import json
import time

relay = {'1': '0', '2': '0', '3': '0', '4': '0', '5': '0', '6': '0', '7': '0', '8': '0', '9': '0', '10': '0', '11': '0', '12': '0'}

while True:
	text = ''
	try:
		for x in range(12):
			text = text+'&r'+str(x+1)+'='+str(relay[str(x+1)])
		# print(text)
		# response = requests.get('http://localhost/2022_rs_wasmonitoring_co_id/api/sendSlave?id=8'+text)
		response = requests.get('http://rs.wasmonitoringonline.co.id/api/sendSlave?id=8'+text)
		print(response.url)
		print(response.text)
		if response.text != '':
			# json_data = json.loads(response.text)
			# relay = json.loads(json_data[0]['relay'])
			# relay = json.loads(json_data['data'])
			relay = response.text[0:12]
			for i, x  in enumerate(relay):
				print("relay {} : {}".format(i, relay[i]))
			print("===============================================================")
		time.sleep(2)
	except:
		pass
		


