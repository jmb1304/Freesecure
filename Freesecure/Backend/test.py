from libs.phue import Bridge
try:
    b = Bridge("172.31.255.156")
    b.connect()
    b.get_api()
    print("ok")
except:
    print("error")