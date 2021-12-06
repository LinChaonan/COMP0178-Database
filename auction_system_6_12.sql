create table buyer
(
    buyer_id       int(10) auto_increment
        primary key,
    user_id        int(10)      not null,
    recommendation varchar(100) null,
    previous_bid   varchar(100) null,
    current_bid    varchar(100) null
);

create table historical_auction_price
(
    auction_id int(10) auto_increment
        primary key,
    item_id    int(10)      not null,
    user_id    int(10)      not null,
    bid_price  varchar(100) not null,
    bid_time   datetime(2)  null
);

create table image
(
    id   int(4) unsigned auto_increment
        primary key,
    name varchar(100)                        null,
    path varchar(100)                        null,
    time timestamp default CURRENT_TIMESTAMP not null
)
    engine = MyISAM;

create table item
(
    item_id       int(12) auto_increment
        primary key,
    seller_id     int(10)            not null,
    category      varchar(255)       not null,
    status        varchar(10)        not null,
    title         varchar(255)       not null,
    description   text               null,
    start_price   varchar(100)       not null,
    reserve_price varchar(100)       null,
    current_price varchar(100)       null,
    num_bids      int(100) default 0 not null,
    buyer_id      int(10)            null,
    end_date      datetime           not null
);

create table seller
(
    seller_id     int(10) auto_increment
        primary key,
    total_revenue varchar(12) default '0' null
);

create table user
(
    user_id      int(10) auto_increment
        primary key,
    email        varchar(100) not null,
    password     varchar(255) not null,
    bank_detail  varchar(255) null,
    address      varchar(255) null,
    phone        varchar(100) null,
    account_type varchar(100) not null,
    constraint email
        unique (email)
);

create table watch_list
(
    watch_id int(20) auto_increment
        primary key,
    item_id  int(20) null,
    user_id  int(20) null
);

create index user_id
    on watch_list (user_id);


