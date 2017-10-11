select tablename from pg_tables order by tablename -- lista todas as tabelas do banco

alter table cidade drop cep
alter table endereco_usuario add usuario_id int references usuario(id) on delete cascade
alter table endereco_usuario add logradouro_id int references logradouro(id) on delete cascade


select * from localizacao
select * from logradouro

delete from logradouro where id = 19

create table usuario_mercado (
    usuario_id int references usuario(id),
    mercado_id int references mercado(id),
    avaliacao int
    primary key (usuario_id, mercado_id)
);

select * from produto

select produto.*, categoria.nome as categoria from produto join categoria on categoria.id = produto.categoria_id where produto.id = 1

 update produto set nome = 'Teste', unidade_medida = 'teste' where id = 1; 