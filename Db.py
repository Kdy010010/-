import sqlite3
import os

def initialize_db(db_name):
    conn = sqlite3.connect(db_name)
    cursor = conn.cursor()
    cursor.execute("CREATE TABLE IF NOT EXISTS files(id INTEGER PRIMARY KEY, filename TEXT, data BLOB)")
    conn.commit()
    return conn

def save_file_to_db(conn, filepath):
    with open(filepath, 'rb') as f:
        data = f.read()
        filename = os.path.basename(filepath)
        cursor = conn.cursor()
        cursor.execute("INSERT INTO files(filename, data) VALUES(?, ?)", (filename, data))
        conn.commit()

conn = initialize_db('my_database.db')
save_file_to_db(conn, 'example.jpg')
