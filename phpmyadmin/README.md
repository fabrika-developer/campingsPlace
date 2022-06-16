

## Usuarios ADMIN FDT (Solo usuarios internos)
- user_class_admin

- - _id (primary_key) 
- - username 	
- - password 	
- - usermail 	
- - userroll 	
- - datechange (se actualiza a cada cambio) 

## Usuarios ADMIN Campings (Solo proprietarios de campings)
- user_class_admin_campings

- - _id (primary_key)
- - user_camping_camping_id
- - user_camping_username
- - user_camping_password
- - user_camping_usermail
- - user_camping_userroll
- - user_camping_camping_name
- - user_camping_camping_mail
- - user_camping_active_user
- - user_camping_plan_type
- - user_camping_country
- - user_camping_region
- - user_camping_departement
- - user_camping_city
- - user_camping_postal_code
- - user_camping_activate_by_time (actualiza cuando entra por primera vez)
- - user_camping_date_change (se actualiza a cada cambio)

## Datos generales de los Campings (no incluso las disponibilidades)
- campings_general_data

- - _id (primary_key) 
- - camping_id (relacionado a 'user_class_admin_campings.user_camping_camping_id)
- - camping_name (alta cuando se crea un usuario de camping)*
- - camping_title (titulo en la ficha de camping)
- - camping_description_default (descripción corta ficha en el idioma del camping)
- - camping_default_language (idioma default para este camping)
- - camping_description_large (descripción larga ficha)
- - camping_classification_rate (numero de estrellas del camping)
- - camping_latitude
- - camping_longitude
- - camping_address
- - camping_contact_mail
- - camping_contact_phone
- - camping_google_maps_route_link
- - camping_youtube_intro_video
- - camping_default_banner
- - camping_social_twitter
- - camping_social_youtube
- - camping_social_instagram
- - camping_social_tiktok
- - camping_social_whatsapp
- - camping_start_opened
- - camping_stop_opened
- - camping_active_plan
- - camping_date_change (se actualiza a cada cambio)

## Habitaciones / Disponibilidades / Areas
- places_campings_availability

- - _id (primary_key)
- - availability_id (relacionado a 'campings_general_data.camping_id)
- - availability_name
- - availability_title
- - availability_description_default (descripción corta que se muestra)
- - availability_description_large (descripción larga ficha)
- - availability_default_banner (banner ficha)
- - availability_default_thumb (thumb de la busqueda)
- - availability_classification_rate (numero de estrellas de la habitación)
- - availability_max_persons
- - availability_min_persons
- - availability_price_max
- - availability_price_min
- - availability_price_per_person
- - availability_active (si esta activo se muestra)
- - availability_can_reserve (si esta reservado o no)
- - availability_start_closed (fecha de inicio de reserva 'indisponible')
- - availability_stop_closed (fecha de fim de reserva 'pasa a disponible')
- - availability_category (si es habitación o plaça de caravana etc)
- - availability_conditions (condiciones de reserva)
- - availability_date_change (se actualiza a cada cambio)

## Accesibilidad / Extras / Contiene o no
- things_places_availability

- - _id (primary_key)
- - things_id (relacionado a 'places_campings_availability.camping_id)
- - things_pools
- - things_pub
- - things_restaurant
- - things_playroom
- - things_breakfast
- - things_child_care
- - things_childrens_area
- - things_senderism
- - things_pharmacy_emergency
- - things_parking
- - things_locker_room (vestiario)
- - things_shower
- - things_bathtub
- - things_internal_activities (actividades gestionadas pelo camping)
- - things_internet_hi_speed (superior a 60 GB)
- - things_specialized_guides (guias disponiveis para rotas)
- - things_allow_dogs
- - things_allow_cats
- - things_allow_birds
- - things_allow_childrens

## Promociones para disponibilidades
- promotions_places_availability

- - _id (primary_key)
- - things_id (relacionado a 'places_campings_availability.camping_id)

## Cupons de desconto
- cupons_discount_prices_availability

- - _id (primary_key)
- - things_id (relacionado a 'places_campings_availability.camping_id)

## Client data de los campings (guardar los datos de los clientes)
- client_camping_data

- - _id (primary_key)
- - things_id (relacionado a 'campings_general_data.camping_id)

## Reservas de disponibilidades (armazena as reservas)
- client_camping_reserve_data

- - _id (primary_key)
- - things_id (relacionado a 'campings_general_data.camping_id)

## Paises del mundo
- camping_country

- - _id (primary_key)
- - country_id
- - country_code
- - country_lang_acron
- - country_name
- - country_name_string
- - country_lat
- - country_long
- - country_postal_code

## Regiones de Paises del mundo
- camping_country_regions

- - _id (primary_key)
- - region_id
- - country_id
- - region_name
- - region_name_string
- - region_lat
- - region_long
- - region_postal_code

## Departamentos de Regiones de Paises del mundo
- camping_country_regions_departments

- - _id (primary_key)
- - department_id
- - region_id
- - department_name
- - department_name_string
- - department_lat
- - department_long
- - department_postal_code

## Ciudades de Departamentos de Regiones de Paises del mundo
- camping_country_regions_departments_citys

- - _id (primary_key)
- - city_id
- - department_id
- - city_name
- - city_name_string
- - city_lat
- - city_long
- - city_postal_code

