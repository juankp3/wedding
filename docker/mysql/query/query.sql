select id_guest,id_guest_parent,name, confirmation, phone,openinvitation_calltoaction,deleted,date_add,date_upd from guest where openinvitation_calltoaction > 0

update guest set confirmation = 'pending'


SELECT id_guest,name,openinvitation_calltoaction as 'open', qyt_tickets, confirmation, phone, date_upd from guest g
order by openinvitation_calltoaction desc;