while True:
    print("----------------------------------------")
    message = input("Insert message to encrypt: ")
    key = int(input("Insert key value: "))
    result = ""

    for char in message:
        
        ascii_offset = ord('A') if char.isupper() else ord('a')
        new_char = chr((ord(char) - ascii_offset + key) % 26 + ascii_offset)
        result += new_char
       
    
    print("Mensagem criptografada:", result)


