import React from 'react';
import ReactDOM from 'react-dom';

function MisProyectos() {
  return (
    <div className="row">
      <div className="col-sm-6">
        <h1 style={{ color: 'coral' }}>MIS PROYECTOS</h1>
      </div>
      <div className="col-sm-6 d-flex justify-content-end align-self-center">
        <a href="/admin/proyectos/create" className="btn btn-sm"
          data-placement="left" style={{ backgroundColor: 'coral', color: 'white' }}>
          Nuevo Proyecto
        </a>
      </div>
    </div>
  );
}

export default MisProyectos;

if (document.getElementById('misProyectos')) {
  ReactDOM.render(
    <React.StrictMode>
      <MisProyectos />
    </React.StrictMode>,
    document.getElementById('misProyectos')
  );
}
