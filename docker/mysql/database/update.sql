ALTER TABLE guest
ADD COLUMN id_guest_parent INT AFTER id_event;

ALTER TABLE guest 
RENAME COLUMN names TO name;

ALTER TABLE guest MODIFY COLUMN phone VARCHAR(30);
