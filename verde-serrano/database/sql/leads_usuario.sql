CREATE TABLE `lead_usuario` (
  `id` integer PRIMARY KEY,
  `nome` varchar(255),
  `email` varchar(255),
  `telefone` varchar(255),
  `estado` varchar(255),
  `cidade` varchar(255),
  `mensagem` text,
  `data_criacao` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
