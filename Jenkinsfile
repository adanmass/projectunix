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

        stage('Deploy Part 1') {
            steps {
                script {
                    sh """
                    cd ${PROJECT_DIR}
                    docker ps -a
                    docker compose down --volumes --remove-orphans --rmi all || true
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
