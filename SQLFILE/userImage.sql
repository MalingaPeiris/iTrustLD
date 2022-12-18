CREATE VIEW user_account as SELECT u.user_id,u.fname,u.lname,u.email,u.email_verification ,u.language , u.mobile_no 
,u.mobile_status ,u.password, u.dob , u.address, u.street , u.country, u.city , u.zip_code , u.account_status 
, u.address_status , u.subcription , i.ide , i.nic_Image , i.address_img , i.status
 FROM users u, user_images i WHERE u.user_id = i.user_id; 