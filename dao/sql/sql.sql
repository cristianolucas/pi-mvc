select tablename from pg_tables order by tablename -- lista todas as tabelas do banco

alter table cidade drop cep
alter table endereco_usuario add usuario_id int references usuario(id) on delete cascade
alter table endereco_usuario add logradouro_id int references logradouro(id) on delete cascade


select * from localizacao
select * from logradouro

delete from logradouro where id = 19