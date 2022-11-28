from selenium import webdriver
from selenium.webdriver.firefox.options import Options
from selenium.webdriver.common.alert import Alert
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import Select
import pandas
import time

###CONFIGURAÇÕES##

#firefox
options = Options()
options.binary_location = r"C:/Program Files/Mozilla Firefox/firefox.exe"

#geckodriver
driver = webdriver.Firefox(options=options, executable_path="C:/geckodriver/geckodriver.exe")

#url
driver.get("http://127.0.0.1:8000")

###FUNÇÕES###

#função para logar no sistema como funcionário
def login(user, password):
  driver.find_element(By.ID, "usuario").send_keys(user)
  driver.find_element(By.ID, "senha").send_keys(password)
  driver.find_element(By.ID, "entrar").click()
  print("LOGIN: "+user)

#função para mover a janela até um elemento
def goTo(element):
  driver.execute_script("arguments[0].scrollIntoView();", element)

#função para mover a janela até o fim e clicar em um elemento
def goToEndClick(string):
  driver.execute_script("window.scrollTo(0,document.body.scrollHeight)")
  time.sleep(3)
  element = driver.find_element(By.ID, string)
  element.click()
  
#função para inserir dados
def setInput(row, string):
  element = driver.find_element(By.ID, string)
  goTo(element)
  element.send_keys(str(row[string]))

#função para clicar em um elemento
def clickInput(string):
  element = driver.find_element(By.ID, string)
  goTo(element)
  time.sleep(1)
  element.click()
  
#função para clicar em um elemento Select
def clickSelectInput(row, string):
  element = driver.find_element(By.ID, string+"_id")
  goTo(element)
  time.sleep(1)
  element.click()
  Select(element).select_by_visible_text(str(row[string]))

#função para cadastrar itens
def cadastrar(name):
  driver.find_element(By.ID, name).click()
  fileName = "csvs/"+name+".csv"
  print("ALVO: "+fileName)
  df = pandas.read_csv(fileName)
  for index, row in df.iterrows():
    goToEndClick("cadastrar")

    if name == "preco_hora":
      setInput(row, "preco")
    elif name == "vaga":
      setInput(row, "numero")
    elif name == "veiculo":
      setInput(row, "placa")
    elif name == "funcionario":
      setInput(row, "nome")
      setInput(row, "usuario")
      setInput(row, "senha")
      clickInput("concordar")
    elif name == "cliente":
      setInput(row, "nome")
      setInput(row, "usuario")
      setInput(row, "senha")
      setInput(row, "email")
      setInput(row, "telefone")
      setInput(row, "endereco")
      setInput(row, "numero")
      setInput(row, "cep")
      setInput(row, "bairro")
      setInput(row, "complemento")
      clickInput("concordar")
      clickInput(row["veiculo"])
      clickSelectInput(row, "cidade")
    elif name == "operacao":
      clickSelectInput(row, "vaga")
      clickSelectInput(row, "veiculo")

    goToEndClick("acao")
    print("CADASTRADO: "+name+" index="+str(index))
  print("CONCLUÍDO: "+fileName)
  goToEndClick("voltar")

def exit():
  driver.find_element(By.ID, "sair").click()
  Alert(driver).accept()
  driver.close()
  driver.quit()
  print("FINALIZADO")

###EXECUÇÃO###

#login
login("julio","123")
  
#preco_hora
cadastrar("preco_hora")

#vaga
cadastrar("vaga")

#veiculo
cadastrar("veiculo")

#funcionario
cadastrar("funcionario")

#cliente
cadastrar("cliente")

#operacao
cadastrar("operacao")

#sair
exit()