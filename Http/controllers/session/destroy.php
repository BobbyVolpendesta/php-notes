<?php

namespace Core;

Authenticator::logout();
header('location: /');
exit();