#! /bin/bash
# Script generates entities from database

php "www/index.php" orm:convert-mapping --namespace="App\Model\Entities\\" --force --from-database annotation "temp"
