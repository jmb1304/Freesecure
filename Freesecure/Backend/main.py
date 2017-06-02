import sys

from libs.phue import Bridge

args = []
args = sys.argv
try:
    if args[1] == "-version":
        print("SecuriD Version 0.1")
        print("Ready")
    elif args[1] == "-check":
        print("ok")
    elif args[1] == "-getlights":
        b = Bridge("172.31.255.156")
        b.connect()
        lights = b.lights
        output = ""
        first = True
        for light in lights:
            output = output + light.name + ","
        print(output)
    elif args[1] == "-setlighton":
        b = Bridge("172.31.255.156")
        b.connect()
        b.set_light(int(args[2]), 'on', True)
        b.set_light(int(args[2]), 'bri', 254)
    elif args[1] == "-setlightoff":
        b = Bridge("172.31.255.156")
        b.connect()
        b.set_light(int(args[2]), 'on', False)
        b.set_light(int(args[2]), 'bri', 0)
    elif args[1] == "-sethubip":
        f = open('hub.settings', 'w')
        f.write(args[2])
        f.close()
        print("Hub IP Address set!")
        print("Now run -huecheck to make sure everything is working!")
    elif args[1] == "-huecheck":
        try:
            b = Bridge("172.31.255.156")
            b.connect()
            print("ok")
        except:
            print("error")
    else:
        print("'" + args[1] + " 'is not a valid argument!")
except:
    print("Arguments Invalid")