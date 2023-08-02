# Teste Backend Laravel - Fácil Consulta

## Endpoints disponíveis

### Listagem de cidades (public)
GET|HEAD   api/cidades ............................................................................................................. CidadeController@index
### Listagem de todos os médicos (public)
GET|HEAD   api/medicos ............................................................................................................. MedicoController@index
### Adicionar novo médico (authenticated)
POST       api/medicos ............................................................................................................. MedicoController@store
### Listagem de médicos por cidade (public)
GET|HEAD   api/cidades/{id_cidade}/medicos ........................................................................................ MedicoController@bycity
### Vincular médico a um paciente (authenticated)
POST       api/medicos/{id_medico}/pacientes ........................................................................MedicoPacienteController@relatePatient
### Listar pacientes vinculados ao médico (authenticated)
GET|HEAD   api/medicos/{id_medico}/pacientes .................................................................................. PacienteController@byDoctor
### Adicionar novo paciente
POST       api/pacientes ......................................................................................................... PacienteController@store
### Atualizar dados do paciente
POST       api/pacientes/{id_paciente} .......................................................................................... PacienteController@update

### Autenticação JWT
POST       api/register ........................................................................................................... AuthController@register
POST       api/login ................................................................................................................. AuthController@login
GET|HEAD   api/user ................................................................................................................... AuthController@user
POST       api/refresh ............................................................................................................. AuthController@refresh
POST       api/logout ............................................................................................................... AuthController@logout
