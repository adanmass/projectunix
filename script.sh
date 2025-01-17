COMMIT_MESSAGE="Automated commit by script"
JENKINS_JOB_NAME="unix"
JENKINS_URL="http://172.18.0.1:8080"
JENKINS_USER="root"
JENKINS_TOKEN="11e4de58ec8509920bdc3777d6ddf835a1"


git add . || { echo "Failed to add files to Git";  }
git commit -m "$COMMIT_MESSAGE" || { echo "Failed to commit changes"; }
git push || { echo "Failed to push changes"; }


echo "Triggering Jenkins job: $JENKINS_JOB_NAME"
JENKINS_JOB_URL="$JENKINS_URL/job/$JENKINS_JOB_NAME/build?token=$JENKINS_TOKEN"

# Send POST request to trigger the Jenkins job
curl -X POST "$JENKINS_JOB_URL" \
    --user "$JENKINS_USER:$JENKINS_TOKEN" \
    --fail || { echo "Failed to trigger Jenkins job"; }

echo "Jenkins job triggered successfully."
