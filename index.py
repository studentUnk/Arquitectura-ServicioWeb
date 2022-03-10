import flask

app = flask.Flask(__name__)
app.config["DEBUG"] = True # debug?

@app.route('/', methods=['GET']) # Enable the accepted methods? PUT, GET POST?
def home():
  return "<h1>Bienvenido a TituloCine</h1><p>Sitio web para ver peliculas</p>"

app.run() # Start and launch flask?
