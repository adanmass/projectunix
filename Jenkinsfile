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
                        docker ps -a
                        docker compose down -v
                    """
                }
            }
        }
        stage('Deploy Part 2') {
            steps {
                script {
                    sh """
                        docker compose up -d
                    """
                }
            }
        }
    }
}

