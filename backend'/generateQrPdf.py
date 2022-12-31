import hashlib
import sys
from reportlab.pdfgen import canvas
import reportlab.lib.units as i
import qrcode
def generateCode(locationName, count, unchangedLocationName):
    input = bytes(locationName, 'utf-8')
    hashed = hashlib.sha512(input).hexdigest()
    if (count < len(unchangedLocationName)):
        generateCode(hashed, count + 1, unchangedLocationName)
    else:
        global encrypted
        encrypted = hashed[:5]
        print(encrypted)
        return encrypted
def generatePDF(name):
    global encrypted
    qr = qrcode.make("http://bridgeminds.com/se/Index.html")
    qr.save("image.png")
    c = canvas.Canvas("Pdf Files\sample_{0}_{1}.pdf".format(name, encrypted))
    c.setFont("Helvetica", 30)
    c.drawString(100, 700, str("code for this location : {0}".format(encrypted)))
    c.setStrokeColorRGB(0, 1, 0)
    c.line(0, 690, 1000 * i.inch, 10 * i.inch)
    c.drawImage("image.png", 40, 150, width=500, height=500, )
    c.drawString(100, 100, str("location : " + name))
    c.save()

encrypted = ''


