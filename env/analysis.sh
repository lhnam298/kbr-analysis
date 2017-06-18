BASEDIR=$(cd $(dirname $0)/../.. && pwd)

CONTAINER_DB="kbr-db"
CONTAINER_WEB="kbr-analysis"

if [ $(docker ps -a | grep $CONTAINER_DB | wc -l) == "0" ]; then
    docker run  --name $CONTAINER_DB \
                -e MYSQL_ALLOW_EMPTY_PASSWORD=yes \
                -p 3306:3306 \
                -d \
                mysql:5.5
fi

docker start $CONTAINER_DB

docker run --name $CONTAINER_WEB \
           -p 80:80 \
           -p 443:443 \
           -e APP_MODE=dev \
           --link $CONTAINER_DB:$CONTAINER_DB \
           -v $BASEDIR/analysis:/var/www/htdocs:ro \
           -dt \
           dongta
