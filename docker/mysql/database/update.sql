ALTER TABLE guest
ADD COLUMN id_guest_parent INT AFTER id_event;

ALTER TABLE guest
RENAME COLUMN names TO name;

ALTER TABLE guest MODIFY COLUMN phone VARCHAR(30);

ALTER TABLE guest
RENAME COLUMN qr TO token;

ALTER TABLE guest MODIFY COLUMN token VARCHAR(500);

ALTER TABLE wishes
ADD COLUMN active INT(11) not null AFTER message;
