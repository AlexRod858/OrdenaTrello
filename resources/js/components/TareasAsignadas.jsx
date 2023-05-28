import React from 'react';
import ReactDOM from 'react-dom';

function TareasAsignadas() {

  return (
    <div className="row">
      <div className="col-sm-6">
        <h1 style={{ color: 'coral' }}>MIS TAREAS ASIGNADAS</h1>
      </div>
    </div>
  );
}

export default TareasAsignadas;

if (document.getElementById('tareasAsignadas')) {
  ReactDOM.render(
    <React.StrictMode>
      <TareasAsignadas />
    </React.StrictMode>,
    document.getElementById('tareasAsignadas')
  );
}
