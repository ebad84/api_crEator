from optparse import OptionParser
from zipfile import ZipFile
import time,requests
TITLE="""\033[92m
            AAAA                   |||||||||||||||||\\     ========|||========                              //CCCCCCCCCCCC
           AAAAAA                  |||                $$           |||                                    CC
          AAAAAAAA                 |||                  $$         |||                                  CC
         AAAA  AAAA                |||                  $$         |||                                 CC
        AAAA    AAAA               |||                $$           |||                                CC
       AAAA      AAAA              |||||||||||||||||//             |||                               CC
      AAAAEEEEEEEEAAAA             |||                             |||                               CC
     AAAA          AAAA            |||                             |||                               CC
    AAAA            AAAA           |||                             |||                                CC
   AAAA              AAAA          |||                             |||                                 CC
  AAAA                AAAA         |||                             |||                                  CC
 AAAA                  AAAA        |||                             |||                                    CC
AAAA                    AAAA       |||                     ========|||========     _______________         \\CCCCCCCCCCCCC      rEator
\033[0m"""


HELP="""
\n welcome to APicrEator!
this is an simple app for creating an api server
you can use those:
\033[91m-h\033[0m \033[94mfor help\033[0m
\033[91m-d\033[0m \033[94mfor downloading a simple api. you need to connect to Enternet to use that\033[0m
\033[91m-c\033[0m \033[94mgo to creat a api server\033[0m
"""

def usage():
    print(HELP)

def download_file(action):
    if action=='simple':
        year = str(time.localtime()[0])
        month = str(time.localtime()[1])
        day = str(time.localtime()[2])
        hour = str(time.localtime()[3])
        min = str(time.localtime()[4])
        sec = str(time.localtime()[5])
        tname = year + '-' + month + '-' + day + '-' + hour + '-' + min + '-' + sec
		a = requests.get().content
		f = open('files_and_codes'+tname+'.zip')
		f.write(a)
		f.close()
        z = ZipFile('files_and_codes.zip', 'r')
        z.extractall('files_and_codes_in_'+tname)
        z.close()
    elif action=='creator':
        z = ZipFile('files_and_codes.zip', 'r')
        z.extractall('origin_files_and_codes_in')
        z.close()

def user_agent():
	optp = OptionParser(add_help_option=False,epilog="APIcrEator")
	# optp.add_option("-s","--server", dest="host",help="attack to server ip -s ip")
	optp.add_option("-c","--port",dest="creat_api",help="go to creat a api server")
	optp.add_option("-d","--turbo",dest="download",help="for downloading a simple api. you need to connect to Enternet to use that")
	optp.add_option("-h","--help",dest="help",action='store_true',help="more helps")
	opts, args = optp.parse_args()
	if opts.help:
		# print('creat_api')
		usage()
	elif opts.creat_api:
		print('help')

	elif opts.download:
		download_file()
	else:
		# print('order not found')
		print(TITLE)
		usage()

	# (options, args) = parser.parse_args()
if __name__ == '__main__':
    # print(TITLE)
    # time.sleep(2)
    # usage()
    user_agent()

