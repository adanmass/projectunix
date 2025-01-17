pipeline {
    agent any
    environment {
        REPO_URL = 'https://github.com/adanmass/projectunix.git'
        PROJECT_DIR = "${env.WORKSPACE}/unixproject"
    }
    stages {
        stage('Prepare Docker Permissions') {
            steps {
                script {
                    sh """
                    # Add jenkins user to docker group if not already added
                    sudo usermod -aG docker jenkins
                    # Restart Jenkins service to apply changes (optional, depending on your setup)
                    sudo systemctl restart jenkins || true
                    """
                }
            }
        }

        stage('Pull Code') {
            steps {
                script {
                    sh """
                    rm -rf ${PROJECT_DIR} || true
                    git clone ${REPO_URL} ${PROJECT_DIR}
                    """
                }
            }
        }

        stage('Prepare Directories') {
            steps {
                script {
                    sh """
                    mkdir -p /tmp/unixproject_db
                    chmod 777 /tmp/unixproject_db
                    """
                }
            }
        }

        stage('Cleanup Containers') {
            steps {
                script {
                    sh """
                    docker rm -f \$(docker ps -aq) || true
                    """
                }
            }
        }

        stage('Deploy Part 1') {
            steps {
                script {
                    sh """
                    cd ${PROJECT_DIR}
                    docker ps -a
                    docker compose down -v || true
                    """
                }
            }
        }

        stage('Deploy Part 2') {
            steps {
                script {
                    sh """
                    cd ${PROJECT_DIR}
                    docker compose up -d
                    """
                }
            }
        }
    }
}

