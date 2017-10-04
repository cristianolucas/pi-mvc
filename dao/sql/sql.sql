select tablename from pg_tables order by tablename -- lista todas as tabelas do banco
select * from usuario

delete from logradouro
delete from endereco_usuario

select * from logradouro
select * from endereco_usuario
delete from logradouro where id = 4
select * from cidade
select * from cidade where nome = 'Jaguaruna'

alter table cidade drop cep

select endereco_usuario.numero, endereco_usuario.complemento, logradouro.bairro, logradouro.logradouro, logradouro.cep, cidade.id as cidade_id, uf.id as uf_id from endereco_usuario join usuario on usuario.id = endereco_usuario.usuario_id join logradouro on endereco_usuario.logradouro_id = logradouro.id join cidade on cidade.id = logradouro.cidade_id join uf on uf.id = cidade.uf_id where usuario.id = 12

select endereco_usuario.numero, endereco_usuario.complemento, logradouro.bairro, logradouro.logradouro, logradouro.cep, cidade.nome as cidade, uf.nome as uf from endereco_usuario join usuario on usuario.id = endereco_usuario.usuario_id join logradouro on endereco_usuario.logradouro_id = logradouro.id join cidade on cidade.id = logradouro.cidade_id join uf on uf.id = cidade.uf_id where usuario.id = 12