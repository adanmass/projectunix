git add .
git commit -m "rocket science" 
git push 

$JENKINS_TOKEN="11149d6e174dfb73096b8dca1efdcafd03"

curl -X POST "http://localhost:8080/job/unixjob/build?token=11149d6e174dfb73096b8dca1efdcafd03" \
    --user "weezo:$JENKINS_TOKEN" \
    --fail
