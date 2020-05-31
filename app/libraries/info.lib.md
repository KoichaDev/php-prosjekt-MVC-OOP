### Core.lib.php

This is going to care of our url, like /post/add, then it will decide what to load from the controller and the metod

### Database.lib.php

This will take care of our CRUD, and counting rows etc. It's the only place where it will interact with the data

### Controller.lib.php
This will easily load model and views. Every controller will extend on this class file
