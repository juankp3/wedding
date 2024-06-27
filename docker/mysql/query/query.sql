select id_guest,id_guest_parent,name, confirmation, phone,openinvitation_calltoaction,deleted,date_add,date_upd from guest where openinvitation_calltoaction > 0

update guest set confirmation = 'pending'


SELECT id_guest,name,openinvitation_calltoaction as 'open', qyt_tickets, confirmation, phone, date_upd from guest g
order by openinvitation_calltoaction desc;




INSERT INTO songs (name,date_add,date_upd) VALUES
	 ('La bicicleta - shakira','2024-06-18 00:00:00','2024-06-18 00:00:00'),
	 ('Desconocidos - Manuel turizo','2024-06-18 00:00:00','2024-06-18 00:00:00'),
	 ('La chata - amen','2024-06-18 00:00:00','2024-06-18 00:00:00');
	

INSERT INTO songs (name,date_add,date_upd) VALUES
	 ('La loba - shakira','2024-06-18 00:00:00','2024-06-18 00:00:00'),
	 ('Fin del tiempo - amen','2024-06-18 00:00:00','2024-06-18 00:00:00');
	
INSERT INTO guest_songs (id_guest,id_songs,id_event,date_add,date_upd) VALUES
	 (1,1,1,'2024-06-18 00:00:00','2024-06-18 00:00:00'),
	 (1,2,1,'2024-06-18 00:00:00','2024-06-18 00:00:00'),
	 (2,3,1,'2024-06-18 00:00:00','2024-06-18 00:00:00'),
	 (3,1,1,'2024-06-18 00:00:00','2024-06-18 00:00:00');
	 
SELECT * from songs s ;
SELECT * from guest_songs gs ;


SELECT s.id_songs, s.name, 
(SELECT count(*)  from guest_songs gs where gs.id_event = 1 and gs.id_songs = s.id_songs) as 'cant'
FROM songs s
group by s.id_songs;


SELECT count(*) as 'cant' from guest_songs gs where gs.id_event = 1 and gs.id_songs = 2;

					