#!/bin/bash -x

schome=${HOME}/schedule-cast

if [ ! -d ${schome}/init.db ] ; then
	mkdir ${schome}/init.db
fi

if [ ! -f ${schome}/init.db/backup.sql ] ; then
	backup=`ls -t ${schome}/backups/backup-* | head -1`

	cp ${backup} ${schome}/init.db/backup.sql
fi

docker-compose up -d
docker container ls

echo
echo now go to http://localhost:80
