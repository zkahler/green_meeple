<?php
// This script will generate a hashed password you can use in the database
echo password_hash("test123", PASSWORD_DEFAULT);