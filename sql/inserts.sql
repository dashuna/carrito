USE tiendaOnline;

insert into categorias (id, nombre) values (2, 'Comida húmeda para gatos');
insert into categorias (id, nombre) values (4, 'Comida húmeda para perros');
insert into categorias (id, nombre) values (1, 'Pienso para gatos');
insert into categorias (id, nombre) values (3, 'Pienso para perros');


insert into marcas (id, nombre) values (3, 'Advance');
insert into marcas (id, nombre) values (8, 'Cosma');
insert into marcas (id, nombre) values (7, 'Feringa');
insert into marcas (id, nombre) values (4, 'Hill´s');
insert into marcas (id, nombre) values (5, 'Pro Plan');
insert into marcas (id, nombre) values (6, 'Purizon');
insert into marcas (id, nombre) values (1, 'Royal Canin');
insert into marcas (id, nombre) values (10, 'Royal Canin Veterinary');
insert into marcas (id, nombre) values (2, 'Ultima');
insert into marcas (id, nombre) values (9, 'Whiskas');


insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (1, 1, 1, 'Royal Canin Sterilised', 'Royal Canin Sterilised', 11.00, 91, 'RoyalCaninSterilised.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (7, 1, 1, 'Royal Canin Sterilised 12+ Ageing', 'Royal Canin Sterilised 12+ Ageing', 23.00, 100, 'RoyalCaninSterilised12Ageing.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (9, 1, 1, 'Royal Canin Kitten Sterilised', 'Royal Canin Kitten Sterilised', 11.00, 55, 'RoyalCaninKittenSterilised.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (10, 1, 1, 'Royal Canin Regular Fit 32', 'Royal Canin Regular Fit 32', 19.50, 100, 'RoyalCaninRegularFit32.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (11, 1, 1, 'Royal Canin Savour Exigent', 'Royal Canin Savour Exigent', 12.49, 100, 'RoyalCaninSavourExigent.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (12, 1, 2, 'Royal Canin Sterilised en salsa', 'Royal Canin Sterilised en salsa', 1.50, 50, 'RoyalCaninSterilisedensalsa.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (13, 1, 2, 'Royal Canin Appetite Control en salsa', 'Royal Canin Appetite Control en salsa', 1.35, 50, 'RoyalCaninAppetiteControlensalsa.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (16, 1, 2, 'Royal Canin Sterilised Kitten en salsa', 'Royal Canin Sterilised Kitten en salsa', 1.40, 45, 'RoyalCaninSterilisedKittenensalsa.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (17, 1, 2, 'Royal Canin Sensory Smell en salsa', 'Royal Canin Sensory Smell en salsa', 1.45, 100, 'RoyalCaninSensorySmellensalsa.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (18, 1, 2, 'Royal Canin Sensory Feel en salsa', 'Royal Canin Sensory Feel en salsa', 1.57, 50, 'RoyalCaninSensoryFeelensalsa.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (19, 2, 1, 'Ultima Esterilizado Adult con pollo para gatos', 'Ultima Esterilizado Adult con pollo para gatos', 1.32, 8, 'UltimaEsterilizadoAdultconpolloparagatos.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (20, 2, 1, 'Ultima Esterilizado Adult con salmón para gatos', 'Ultima Esterilizado Adult con salmón para gatos', 1.30, 49, 'UltimaEsterilizadoAdultconsalmónparagatos.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (21, 2, 1, 'Ultima Esterilizado Bolas de pelo para gatos', 'Ultima Esterilizado Bolas de pelo para gatos', 1.30, 50, 'UltimaEsterilizadoBolasdepeloparagatos.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (22, 2, 1, 'Ultima Adult con pollo para gatos', 'Ultima Adult con pollo para gatos', 1.30, 40, 'UltimaAdultconpolloparagatos.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (23, 2, 1, 'Ultima Bolas de Pelo con pavo para gatos', 'Ultima Bolas de Pelo con pavo para gatos', 1.30, 40, 'UltimaBolasdePeloconpavoparagatos.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (24, 2, 1, 'Ultima Tracto Urinario con pollo para gatos', 'Ultima Tracto Urinario con pollo para gatos', 1.28, 25, 'UltimaTractoUrinarioconpolloparagatos.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (26, 1, 2, 'Royal Canin Instinctive en salsa', 'Royal Canin Instinctive en salsa', 1.67, 20, 'RoyalCaninInstinctiveensalsa.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (27, 1, 2, 'Royal Canin Kitten en salsa', 'Royal Canin Kitten en salsa', 1.34, 20, 'RoyalCaninKittenensalsa.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (28, 1, 2, 'Royal Canin Mother & Babycat Mousse', 'Royal Canin Mother & Babycat Mousse', 2.00, 10, 'RoyalCaninMother&BabycatMousse.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (29, 1, 2, 'Royal Canin Mother & Babycat Mousse', 'Royal Canin Mother & Babycat Mousse', 2.00, 10, 'RoyalCaninMother&BabycatMousse.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (30, 1, 2, 'Royal Canin Urinary Care en salsa', 'Royal Canin Urinary Care en salsa', 1.35, 20, 'RoyalCaninUrinaryCareensalsa.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (31, 1, 2, 'Royal Canin Digest Sensitive en salsa', 'Royal Canin Digest Sensitive en salsa', 1.35, 20, 'RoyalCaninDigestSensitiveensalsa.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (32, 1, 2, 'Royal Canin Light Weight Care Adult en salsa', 'Royal Canin Light Weight Care Adult en salsa', 2.01, 100, 'RoyalCaninLightWeightCareAdultensalsa.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (33, 3, 1, 'Advance Sterilized Adult con pavo', 'Advance Sterilized Adult con pavo', 15.90, 21, 'AdvanceSterilizedAdultconpavo.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (34, 3, 1, 'Advance Sterilized Sensitive Adult con salmón', 'Advance Sterilized Sensitive Adult con salmón', 20.99, 50, 'AdvanceSterilizedSensitiveAdultconsalmón.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (35, 3, 1, 'Advance Sterilized Hairball con pavo', 'Advance Sterilized Hairball con pavo', 18.98, 29, 'AdvanceSterilizedHairballconpavo.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (36, 3, 1, 'Advance Sterilized Junior con pollo', 'Advance Sterilized Junior con pollo', 25.78, 20, 'AdvanceSterilizedJuniorconpollo.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (37, 3, 1, 'Advance Sterilized Senior +10 con pollo', 'Advance Sterilized Senior +10 con pollo', 18.99, 100, 'AdvanceSterilizedSenior10conpollo.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (38, 3, 1, 'Advance Kitten con pollo', 'Advance Kitten con pollo', 23.89, 120, 'AdvanceKittenconpollo.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (39, 4, 1, 'Hill''s Young Adult Sterilised con pollo pienso para gatos', 'Hill''s Young Adult Sterilised con pollo pienso para gatos', 24.00, 24, 'Hill''sYoungAdultSterilisedconpollo.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (40, 4, 1, 'Hill''s Young Adult Sterilised con pato pienso para gatos', 'Hill''s Young Adult Sterilised con pato pienso para gatos', 29.00, 23, 'Hill''sYoungAdultSterilisedconpato.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (41, 4, 1, 'Hill''s Young Adult Sterilised con atún pienso para gatos', 'Hill''s Young Adult Sterilised con atún pienso para gatos', 42.00, 22, 'Hill''sYoungAdultSterilisedconatún.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (42, 4, 1, 'Hill''s Mature Adult Sterilised con pollo pienso para g', 'Hill''s Mature Adult Sterilised con pollo pienso para g', 39.99, 10, 'Hill''sMatureAdultSterilisedconpollo.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (43, 5, 1, 'Pro Plan 3 kg pienso para gatos', 'Pro Plan 3 kg pienso para gatos', 23.89, 23, 'ProPlan3kg.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (44, 5, 1, 'Purina Pro Plan Sterilised Adult rico en salmón', 'Purina Pro Plan Sterilised Adult rico en salmón para gatos', 32.10, 90, 'PurinaProPlanSterilisedAdultricoensalmón.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (45, 5, 1, 'Purina Pro Plan Sterilised Adult rico en pavo para gatos', 'Purina Pro Plan Sterilised Adult rico en pavo para gatos', 23.99, 39, 'PurinaProPlanSterilisedAdultricoenpavo.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (46, 5, 1, 'Purina Pro Plan Sterilised Adult con conejo para gatos', 'Purina Pro Plan Sterilised Adult con conejo para gatos', 23.99, 20, 'PurinaProPlanSterilisedAdultconconejo.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (47, 6, 1, 'Purizon Adult Sterilised con pollo y pavo', 'Purizon Adult Sterilised con pollo y pavo', 23.99, 10, 'PurizonAdultSterilisedconpolloypavo.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (48, 6, 1, 'Purizon Adult Sterilised con pollo y pescado', 'Purizon Adult Sterilised con pollo y pescado', 32.99, 10, 'PurizonAdultSterilisedconpolloypescado.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (49, 6, 1, 'Purizon Adult con jabalí y pollo', 'Purizon Adult con jabalí y pollo', 43.89, 21, 'PurizonAdultconjabalíypollo.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (50, 7, 1, 'Feringa Sterilised con salmón', 'Feringa Sterilised con salmón', 12.99, 30, 'FeringaSterilise consalmón.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (51, 7, 1, 'Feringa Sterilised con ave', 'Feringa Sterilised con ave', 23.99, 12, 'FeringaSterilisedconave.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (52, 7, 1, 'Feringa Adult prensado en frío con pavo', 'Feringa Adult prensado en frío con pavo', 23.99, 19, 'FeringaAdultprensadoenfríoconpavo.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (53, 7, 1, 'Feringa Adult con pescado', 'Feringa Adult con pescado', 23.99, 10, 'FeringaAdultconpescado.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (54, 7, 2, 'Feringa Pure Meat Menu ', 'Feringa Pure Meat Menu ', 2.99, 90, 'FeringaPureMeatMenu.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (55, 7, 2, 'Feringa Pure Meat Menu Ternera con calabaza y arándanos', 'Feringa Pure Meat Menu Ternera con calabaza y arándanos', 2.99, 100, 'FeringaPureMeatMenuTernera.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (56, 7, 2, 'Feringa Pure Meat Menu con pavo desmenuzado', 'Feringa Pure Meat Menu con pavo desmenuzado', 2.99, 100, 'FeringaPureMeatMenuconpavodesmenuzado.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (57, 8, 2, 'Cosma Soup', 'Cosma Soup 48 x 40 g comida húmeda para gatos ', 3.12, 100, 'CosmaSoup.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (58, 8, 2, 'Cosma Original', 'Cosma Original en gelatina', 3.12, 120, 'CosmaOriginalengelatina.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (59, 8, 2, 'Cosma Asia', 'Cosma Asia en gelatina', 3.99, 120, 'CosmaAsiaengelatina.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (60, 8, 2, 'Cosma Nature Kitten', 'Cosma Nature Kitten', 3.12, 119, 'CosmaNatureKitten.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (61, 8, 2, 'Cosma Nature', 'Cosma Nature 6 x 70 g', 2.89, 100, 'CosmaNature6x70g.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (62, 9, 2, 'Whiskas Adult Pure Delight ', 'Whiskas 1+ Adult Pure Delight en bolsitas 24 x 85 g', 8.99, 90, 'Whiskas+AdultPureDelightenbolsitas24x85g.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (63, 9, 2, 'Whiskas Adult Pure Delight', 'Whiskas 1+ Adult Pure Delight en bolsitas 12 x 85 g', 11.00, 35, 'Whiskas1AdultPureDelightenbolsita12x85g.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (64, 9, 2, 'Whiskas Junior', 'Whiskas Junior 2-12 meses 12 en bolsitas', 9.89, 43, 'WhiskasJunior212mesesenbolsitas.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (65, 9, 2, 'Whiskas 7+ años', 'Whiskas 7+ años 12 en bolsitas', 9.89, 34, 'Whiskas+años12enbolsitas.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (66, 9, 2, 'Whiskas', 'Whiskas 7+ años 24 x en bolsitas', 11.00, 34, 'Whiskas7+años24enbolsitas.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (67, 9, 2, 'Megapack Whiskas', 'Megapack Whiskas 11+ años en bolsitas', 11.00, 13, 'MegapackWhiskas11añosenbolsitas.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (68, 9, 2, 'Whiskas 1+ años', 'Whiskas 1+ años 12 en bolsitas', 8.90, 89, 'Whiskas1+años12enbolsitas.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (69, 10, 2, 'Royal Canin Veterinary Feline Early Renal ', 'Royal Canin Veterinary Feline Early Renal sobres para gatos', 4.00, 90, 'RoyalCaninVeterinaryFelineEarlyRenal.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (70, 10, 2, 'Royal Canin Veterinary Feline Urinary ', 'Royal Canin Veterinary Feline Urinary S-O sobres para gatost', 4.00, 58, 'RoyalCaninVeterinaryFelineUrinary.jpg');
insert into productos (id, id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) values (71, 10, 2, 'Royal Canin Veterinary Feline Gastro Intestinal ', 'Royal Canin Veterinary Feline Gastro Intestinal sobres para gatos', 3.99, 89, 'RoyalCaninVeterinaryFelineGastroIntestinal.jpg');


insert into roles (id, rol) values (1, 'administrador');
insert into roles (id, rol) values (2, 'usuario');


insert into usuarios (id, id_rol, usuario, password, nombre, apellidos, email, telefono) values (3, 2, 'ana', '$2y$10$xbeYPqX2EMfhdwwEg3AlSuQKZ2DAHEjDiK2aj1Zg267eVg57tnaWq', 'Ana', 'García', 'ana.garcia@ejemplo.es', 651342512);
insert into usuarios (id, id_rol, usuario, password, nombre, apellidos, email, telefono) values (4, 1, 'admin', '$2y$10$dvEOgIec86B5CVRlB0cTKeLCf8BGsTQbXVERu9A7FivbTsZbVU3Pu', 'Dasha', 'Lynnyk', 'dasha.lynnyk@ejemplo.es', 654123134);
