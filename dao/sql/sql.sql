select tablename from pg_tables order by tablename -- lista todas as tabelas do banco
select * from usuario
select * from cidade
select * from cidade where nome = 'Jaguaruna'
select * from logradouro
select * from endereco_usuario

delete from usuario
delete from endereco_usuario
delete from logradouro

alter table cidade drop cep
alter table endereco_usuario add usuario_id int references usuario(id) on delete cascade
alter table endereco_usuario add logradouro_id int references logradouro(id) on delete cascade

select endereco_usuario.numero, endereco_usuario.complemento, logradouro.id as logradouro_id, logradouro.bairro, logradouro.logradouro, logradouro.cep, cidade.id as cidade_id, uf.id as uf_id from endereco_usuario join usuario on usuario.id = endereco_usuario.usuario_id join logradouro on endereco_usuario.logradouro_id = logradouro.id join cidade on cidade.id = logradouro.cidade_id join uf on uf.id = cidade.uf_id where usuario.id = 12

select endereco_usuario.numero, endereco_usuario.complemento, logradouro.bairro, logradouro.logradouro, logradouro.cep, cidade.nome as cidade, uf.nome as uf from endereco_usuario join usuario on usuario.id = endereco_usuario.usuario_id join logradouro on endereco_usuario.logradouro_id = logradouro.id join cidade on cidade.id = logradouro.cidade_id join uf on uf.id = cidade.uf_id where usuario.id = 12

select usuario_id from endereco_usuario where usuario_id = 21

delete from logradouro where id=(select logradouro_id from endereco_usuario where usuario_id=12);delete from endereco_usuario where usuario_id = 12;delete from usuario where id = 12



select endereco_usuario.numero, endereco_usuario.complemento, logradouro.id as logradouro_id, logradouro.bairro, 
logradouro.logradouro, logradouro.cep, cidade.id as cidade_id, uf.id as uf_id from endereco_usuario 
join usuario on usuario.id = endereco_usuario.usuario_id join logradouro on endereco_usuario.logradouro_id = logradouro.id 
join cidade on cidade.id = logradouro.cidade_id join uf on uf.id = cidade.uf_id where usuario.id = 25