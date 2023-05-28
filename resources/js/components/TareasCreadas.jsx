import React from 'react';
import ReactDOM from 'react-dom';

function TareasCreadas() {

  return (
    <div className="row">
      <div className="col-sm-6">
        <h1 style={{ color: 'coral' }}>MIS TAREAS CREADAS</h1>
      </div>
    </div>
  );
}

export default TareasCreadas;

if (document.getElementById('tareasCreadas')) {
  ReactDOM.render(
    <React.StrictMode>
      <TareasCreadas />
    </React.StrictMode>,
    document.getElementById('tareasCreadas')
  );
}
