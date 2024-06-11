select id_guest,id_guest_parent,name, confirmation, phone,openinvitation_calltoaction,deleted,date_add,date_upd from guest where openinvitation_calltoaction > 0

update guest set confirmation = 'pending'
