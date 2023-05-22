import React from 'react';
import { InertiaLink } from '@inertiajs/inertia-react';




export default function AdminProyectosIndex({ proyectos }) {
    return (
        <>
            
            <div className="container-fluid">
            <div className="row">
        <div className="col-sm-12">
          <div className="card">
            <div className="card-header">
              <div style={{ display: 'flex', justifyContent: 'space-between', alignItems: 'center' }}>
                <span id="card_title" style={{ fontWeight: 'bold' }}>
                  Todos mis proyectos
                </span>
                <div className="float-right">
                  <a href={route('admin.proyectos.create')} className="btn btn-warning btn-sm float-right" data-placement="left">
                    Nuevo Proyecto
                  </a>
                </div>
              </div>
            </div>
            {/* Mostrar mensaje de éxito si existe */}
            {/* {session.has('success') && (
              <div className="alert alert-success">
                <p>{session.get('success')}</p>
              </div>
            )} */}
            <div className="card-body">
              <div className="table-responsive">
                {proyectos.length > 0 ? (
                  <table className="table table-striped table-hover">
                    <thead className="thead">
                      <tr>
                        <th>No.</th>
                        <th>Nombre de Proyecto</th>
                        <th>Id del proyecto</th>
                        <th>Fecha Creación</th>
                        <th>Nº Tareas</th>
                        <th>Realizadas</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      {proyectos.map((proyecto, index) => (
                        <tr key={proyecto.id}>
                          <td>{index + 1}</td>
                          <td>{proyecto.titulo}</td>
                          <td>{proyecto.id}</td>
                          <td>{proyecto.created_at}</td>
                          {/* <td>{proyecto.tareas.length}</td> */}
                          <td>
                            {/* {proyecto.tareasCompletadas()} / {proyecto.tareas.length} */}
                          </td>
                          <td>
                            {/* <form action={route('admin.proyectos.destroy', proyecto.id)} method="POST">
                              <InertiaLink
                                href={route('admin.proyectos.show', proyecto.id)}
                                className="btn btn-sm btn-primary"
                              >
                                <i className="fa fa-fw fa-eye"></i> Ver proyecto
                              </InertiaLink>
                              <InertiaLink
                                href={route('admin.proyectos.edit', proyecto.id)}
                                className="btn btn-sm btn-success"
                              >
                                <i className="fa fa-fw fa-edit"></i> Editar
                              </InertiaLink>
                              <button type="submit" className="btn btn-danger btn-sm">
                                <i className="fa fa-fw fa-trash"></i> Eliminar
                              </button>
                              <input type="hidden" name="_method" value="DELETE" />
                              <input type="hidden" name="_token" value={csrf_token} />
                            </form> */}
                          </td>
                        </tr>
                      ))}
                    </tbody>
                  </table>
                ) : (
                  <p>No hay proyectos aún.</p>
                )}
              </div>
            </div>
          </div>
          {/* Renderizar la paginación */}
          {!!proyectos.links && (
            <div className="pagination">
              {proyectos.links.previous && (
                <InertiaLink
                  href={proyectos.links.previous}
                  className="pagination__link"
                  preserveState
                >
                  Anterior
                </InertiaLink>
              )}
              {proyectos.links.pages.map((page) => (
                <InertiaLink
                  key={page.url}
                  href={page.url}
                  className={`pagination__link ${page.active ? 'pagination__link--active' : ''}`}
                  preserveState
                >
                  {page.label}
                </InertiaLink>
              ))}
              {proyectos.links.next && (
                <InertiaLink href={proyectos.links.next} className="pagination__link" preserveState>
                  Siguiente
                </InertiaLink>
              )}
            </div>
          )}
        </div>
      </div>
            </div>

        </>
    );
}
