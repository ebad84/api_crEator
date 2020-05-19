from optparse import OptionParser
from zipfile import ZipFile
import time,requests,os
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
    try:
        requests.get('www.google.com')
    except:
        print('we have an error here. i think you do not have connection to internet. check your connection')
        exit()
    if action=='simple':
        print('simpole')
        index='https://raw.githubusercontent.com/ebad84/api_crEator/master/simple/index.php'
        test='https://raw.githubusercontent.com/ebad84/api_crEator/master/simple/test.php'
        db='https://raw.githubusercontent.com/ebad84/api_crEator/master/simple/engine/db.php'
        database='https://raw.githubusercontent.com/ebad84/api_crEator/master/simple/database_file/database.sql'
        index1=index.split('https://raw.githubusercontent.com/ebad84/api_crEator/master/simple/')
        test1=test.split('https://raw.githubusercontent.com/ebad84/api_crEator/master/simple/')
        db1=db.split('https://raw.githubusercontent.com/ebad84/api_crEator/master/simple/')
        database1=database.split('https://raw.githubusercontent.com/ebad84/api_crEator/master/simple/')
        files=[index1,test1,db1,database1]
        urls=[index,test,db,database]
        year = str(time.localtime()[0])
        month = str(time.localtime()[1])
        day = str(time.localtime()[2])
        hour = str(time.localtime()[3])
        min = str(time.localtime()[4])
        sec = str(time.localtime()[5])
        tname = year + '-' + month + '-' + day + '-' + hour + '-' + min + '-' + sec
        foldername = 'simple' + tname
        folders = [foldername, foldername + '/' + tname, foldername + '/' + tname + '/engine',
                   foldername + '/' + tname + '/database_file']
        for i in range(0, len(folders)):
            try:
                os.mkdir(str(folders[i]))
            except:
                pass
        for i in range(0,len(files)):
            file=foldername+'/'+tname+'/'+(files[i])[1]
            f=open(str(file),'w')
            a=requests.get(urls[i]).text
            try:
                f.write(a)
            except:
                pass
            f.close()
    elif action=='creator':
        index='https://raw.githubusercontent.com/ebad84/api_crEator/master/api_files/index.php'
        test='https://raw.githubusercontent.com/ebad84/api_crEator/master/api_files/test.php'
        db='https://raw.githubusercontent.com/ebad84/api_crEator/master/api_files/engine/db.php'
        database='https://raw.githubusercontent.com/ebad84/api_crEator/master/api_files/database_file/database.sql'
        index1=index.split('https://raw.githubusercontent.com/ebad84/api_crEator/master/api_files/')
        test1=test.split('https://raw.githubusercontent.com/ebad84/api_crEator/master/api_files/')
        db1=db.split('https://raw.githubusercontent.com/ebad84/api_crEator/master/api_files/')
        database1=database.split('https://raw.githubusercontent.com/ebad84/api_crEator/master/api_files/')
        files=[index1,test1,db1,database1]
        urls=[index,test,db,database]
        year = str(time.localtime()[0])
        month = str(time.localtime()[1])
        day = str(time.localtime()[2])
        hour = str(time.localtime()[3])
        min = str(time.localtime()[4])
        sec = str(time.localtime()[5])
        tname = year + '-' + month + '-' + day + '-' + hour + '-' + min + '-' + sec
        foldername = 'clreator' + tname
        folders = [foldername, foldername + '/' + tname, foldername + '/' + tname + '/engine',
                   foldername + '/' + tname + '/database_file']
        for i in range(0, len(folders)):
            # os.mkdir(str(folders[i]))
            if i == 0 or i == '0':
                a = os.listdir('./')
                for i2 in range(0, len(a)):
                    if a[i2] != 'clreator':
                        try:
                            os.mkdir(str(folders[i]))
                        except:
                            pass
            else:
                try:
                    os.mkdir(str(folders[i]))
                except:
                    pass
        for i in range(0, len(files)):
            file=foldername+'/'+tname+'/'+(files[i])[1]
            f=open(str(file),'w')
            a=requests.get(urls[i]).text
            try:
                f.write(a)
            except:
                pass
            f.close()

def user_agent():
    optp = OptionParser(add_help_option=False,epilog="APIcrEator")
    optp.add_option("-s","--simple",dest="simple",action='store_true',help="go to creat a api server")
    optp.add_option("-c","--creator",dest="creator",action='store_true',help="for downloading a simple api. you need to connect to Enternet to use that")
    optp.add_option("-h","--help",dest="help",action='store_true',help="more helps")
    opts, args = optp.parse_args()
    if opts.help:
        usage()
    elif opts.simple:
        download_file('simple')
    elif opts.creator:
        download_file('creator')
    else:
        print(TITLE)
        usage()
if __name__ == '__main__':
    user_agent()