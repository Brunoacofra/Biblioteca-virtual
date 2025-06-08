
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `autor` (
  `aut_codigo` int(11) NOT NULL,
  `aut_nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



CREATE TABLE `genero` (
  `gen_codigo` int(11) NOT NULL,
  `gen_nome` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



CREATE TABLE `livro` (
  `liv_codigo` int(11) NOT NULL,
  `liv_nome` varchar(120) NOT NULL,
  `aut_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



CREATE TABLE `genero_livro` (
  `gl_codigo` int(11) NOT NULL,
  `liv_codigo` int(11) NOT NULL,
  `gen_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- Índices

ALTER TABLE `autor`
  ADD PRIMARY KEY (`aut_codigo`);

ALTER TABLE `genero`
  ADD PRIMARY KEY (`gen_codigo`);

ALTER TABLE `livro`
  ADD PRIMARY KEY (`liv_codigo`);

ALTER TABLE `genero_livro`
  ADD PRIMARY KEY (`gl_codigo`);

-- Auto_increment

ALTER TABLE `autor`
  MODIFY `aut_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

ALTER TABLE `genero`
  MODIFY `gen_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

ALTER TABLE `livro`
  MODIFY `liv_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

ALTER TABLE `genero_livro`
  MODIFY `gl_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

-- Foreign Keys com ON DELETE CASCADE

ALTER TABLE `livro`
  ADD CONSTRAINT `fk_livro_autor`
  FOREIGN KEY (`aut_codigo`) REFERENCES `autor`(`aut_codigo`)
  ON DELETE CASCADE;

ALTER TABLE `genero_livro`
  ADD CONSTRAINT `fk_genero_livro_livro`
  FOREIGN KEY (`liv_codigo`) REFERENCES `livro`(`liv_codigo`)
  ON DELETE CASCADE;

ALTER TABLE `genero_livro`
  ADD CONSTRAINT `fk_genero_livro_genero`
  FOREIGN KEY (`gen_codigo`) REFERENCES `genero`(`gen_codigo`)
  ON DELETE CASCADE;

COMMIT;
