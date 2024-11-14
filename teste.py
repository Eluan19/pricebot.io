import sys
import requests

# Recebe os parâmetros passados pelo PHP (usuário e senha)
usuario = sys.argv[1]
senha = sys.argv[2]

# URL do endpoint de login
url = "https://api.sankhya.com.br/login"

# Parâmetros de autenticação
token = "616b9d6d-5543-45ed-826e-8f862c2abebc"  # Substitua pelo seu token
appkey = "098143c9-57cc-49b4-9d93-13f38fc8def2"  # Substitua pela sua appkey

# Cabeçalhos da requisição
headers = {
    'Token': token,  # Use o Bearer Token
    'Appkey': appkey,  # Inclua o appkey conforme exigido pela API
    'Username': usuario,
    'Password': senha  # Definindo o tipo de conteúdo como JSON
}

# Fazendo a requisição POST para o login
response = requests.post(url, headers=headers)

# Verificando a resposta e retornando o resultado
if response.status_code == 200:
    # Login bem-sucedido
    print("SUCCESS")  # Retorna uma resposta de sucesso
else:
    # Erro na requisição
    print(f"ERROR: {response.status_code} - {response.json()}")  # Retorna um erro com código e mensagem
