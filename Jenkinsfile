pipeline {
    agent any
    environment {
        REPO_URL = 'https://github.com/adanmass/projectunix.git'
        PROJECT_DIR = "${env.WORKSPACE}/unixproject"
    }
    stages {
        stage('Pull Code') {
            steps {
                script {
                    // Clean up previous builds
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
                    // Ensure required directories exist and have correct permissions
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
                    // Forcefully stop and remove all containers
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
                       echo '0812' | sudo -S docker compose up -d
                    """
                }
            }
        }
    }
}

