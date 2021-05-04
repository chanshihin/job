from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from bs4 import BeautifulSoup
import pymysql
def main():
    driver = webdriver.Chrome()
    connection = pymysql.connect(host="localhost",user="root",passwd="",database="fyo" )
    cursor = connection.cursor()
    titl=[] #List to store name of the product
    cont=[] #List to store price of the product
    data=[]
    #driver.get("https://hk.news.yahoo.com/")
    #content = driver.page_source
    #soup = BeautifulSoup(content)
    #for a in soup.findAll('li', attrs={'class':'js-stream-content Pos(r)'}):
     #   title=a.find("h3")
      #  titl.append(title.text)
    #driver.get("https://hk.news.yahoo.com/sports")
    #content = driver.page_source
    #soup = BeautifulSoup(content)
    #for a in soup.findAll('li', attrs={'class':'js-stream-content Pos(r)'}):
     #   title=a.find("h3")
      #  titl.append(title.text)
    #driver.get("https://www.bbc.com/sport")
    #content = driver.page_source
    #soup = BeautifulSoup(content)
    #for a in soup.findAll('a', attrs={'class':'gs-c-promo-heading gs-o-faux-block-link__overlay-link sp-o-link-split__anchor gel-pica-bold'}):
     #   title=a.find("h3")
      #  if title.text not in titl:
       #     titl.append(title.text)
    #driver.get("https://www.bbc.com/weather")
    #content = driver.page_source
    #soup = BeautifulSoup(content)
    #for a in soup.findAll('a', attrs={'class':'gs-c-promo-heading gs-o-faux-block-link__overlay-link gel-pica-bold nw-o-link-split__anchor'}):
     #   title=a.find("h3")
      #  if title.text not in titl:
       #     titl.append(title.text)
    driver.get("https://www.bbc.com/news")
    content = driver.page_source
    soup = BeautifulSoup(content)
    for a in soup.findAll('a', attrs={'class':'gs-c-promo-heading gs-o-faux-block-link__overlay-link gel-pica-bold nw-o-link-split__anchor'}):
        title=a.find("h3")
        url=a.get('href')
        if title.text not in titl:
            titl.append(title.text)
            data.append(url)
    driver.get("https://www.bbc.com/news/world")
    content = driver.page_source
    soup = BeautifulSoup(content)
    for a in soup.findAll('a', attrs={'class':'gs-c-promo-heading gs-o-faux-block-link__overlay-link gel-pica-bold nw-o-link-split__anchor'}):
        title=a.find("h3")
        url=a.get('href')        
        if title.text not in titl:
            titl.append(title.text)
            data.append(url)
    driver.get("https://www.bbc.com/news/coronavirus")
    content = driver.page_source
    soup = BeautifulSoup(content)
    for a in soup.findAll('a', attrs={'class':'gs-c-promo-heading gs-o-faux-block-link__overlay-link gel-pica-bold nw-o-link-split__anchor'}):
        title=a.find("h3")
        url=a.get('href')        
        if title.text not in titl:
            titl.append(title.text)
            data.append(url)
    driver.get("https://www.bbc.com/news/world/asia")
    content = driver.page_source
    soup = BeautifulSoup(content)
    for a in soup.findAll('a', attrs={'class':'gs-c-promo-heading gs-o-faux-block-link__overlay-link gel-pica-bold nw-o-link-split__anchor'}):
        title=a.find("h3")
        url=a.get('href')      
        if title.text not in titl:
            titl.append(title.text)
            data.append(url)
    driver.get("https://www.bbc.com/news/uk")
    content = driver.page_source
    soup = BeautifulSoup(content)
    for a in soup.findAll('a', attrs={'class':'gs-c-promo-heading gs-o-faux-block-link__overlay-link gel-pica-bold nw-o-link-split__anchor'}):
        title=a.find("h3")
        url=a.get('href')        
        if title.text not in titl:
            titl.append(title.text)
            data.append(url)
    driver.get("https://www.bbc.com/news/business")
    content = driver.page_source
    soup = BeautifulSoup(content)
    for a in soup.findAll('a', attrs={'class':'gs-c-promo-heading gs-o-faux-block-link__overlay-link gel-pica-bold nw-o-link-split__anchor'}):
        title=a.find("h3")
        url=a.get('href')        
        if title.text not in titl:
            titl.append(title.text)
            data.append(url)
    driver.get("https://www.bbc.com/news/technology")
    content = driver.page_source
    soup = BeautifulSoup(content)
    for a in soup.findAll('a', attrs={'class':'gs-c-promo-heading gs-o-faux-block-link__overlay-link gel-pica-bold nw-o-link-split__anchor'}):
        title=a.find("h3")
        url=a.get('href')        
        if title.text not in titl:
            titl.append(title.text)
            data.append(url)
    print(data)
    for i in range(len(data)):
        if data[i][0] == "/":
            data[i]="https://www.bbc.com"+data[i]     
              
    for i in range(len(data)):
        conte=""
        driver.get(data[i])
        content = driver.page_source
        soup = BeautifulSoup(content)
        for a in soup.findAll('div', attrs={'class':'ssrcss-3z08n3-RichTextContainer e5tfeyi2'}):
            con=a.find('p')
            if con != None:
                conte=conte+"<p>"+con.text+"</p>"
        cont.append(conte)
    for i in range(len(cont)):
        cursor.execute("INSERT INTO fypppp(title, content) VALUES(%s, %s)",(titl[i],cont[i]))
    sql= "Select id ,title, content from fypppp;"
    cursor.execute(sql)
    rows = cursor.fetchall()
    for row in rows:
        f = open((str(row[0])+'.html'),'w',encoding="utf-8")
        title=row[1]
        content=row[2]
        message = '''<html>
        <body style= "font-size: 30px"><u><h1 style= "font-size: 50px">{title}</h1></u><br>{content}</body>
        </html>'''.format(content=content,title=title)
        f.write(message)
        f.close()
    connection.commit()
    connection.close()
    driver.close()
main()


