git add .
git commit -m "script commit" 
git push 

JENKINS_TOKEN="11a8ec20ed25dc7c0979ddac1de1f1f875"

curl -X POST "http://localhost:8080/job/unixjob/build?token=11a8ec20ed25dc7c0979ddac1de1f1f875" \
    --user "doaa:$JENKINS_TOKEN" \
    --fail
