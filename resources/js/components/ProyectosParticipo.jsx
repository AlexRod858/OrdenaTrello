import React from 'react';
import ReactDOM from 'react-dom';

function ProyectosParticipo() {

  return (
    <div className="row">
      <div className="col-sm-6">
        <h1 style={{ color: 'coral' }}>PROYECTOS EN LOS QUE PARTICIPO</h1>
      </div>
    </div>
  );
}

export default ProyectosParticipo;

if (document.getElementById('proyectosParticipo')) {
  ReactDOM.render(
    <React.StrictMode>
      <ProyectosParticipo />
    </React.StrictMode>,
    document.getElementById('proyectosParticipo')
  );
}
