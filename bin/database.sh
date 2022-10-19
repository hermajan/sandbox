#! /bin/bash
# Script handles database

COMMAND=$1

function help() {
    echo "clean - cleans cache"
    echo "entities - generates entities from database to classes"
    echo "update - updates database schema from entities"
    echo "validate - validates schema"
}

# Cleans cache
function clean() {
    php "www/index.php" orm:clear-cache:metadata
}

# Generates entities from database to classes
function entities() {
    php "www/index.php" orm:convert-mapping --namespace="App\Models\\" --force --from-database annotation ".temp"
}

# Updates database schema from entities
function update() {
    php "www/index.php" orm:schema-tool:update --dump-sql

    echo -e "\nDo you want to update schema?"
    select structure in "Yes" "No"; do
        case $structure in
            "Yes") php "www/index.php" orm:schema-tool:update --force; break;;
            "No") echo "Nothing was updated!"; break;;
            *) echo "Nothing was updated!"; break;;
        esac
    done
}

# Validates schema
function validate() {
    php "www/index.php" orm:validate-schema
}

if [[ "${COMMAND}" == "" ]]; then
    help
fi

# run command
$COMMAND
