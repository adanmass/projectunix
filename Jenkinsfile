pipeline {
    agent any
    stages {
        stage('git clone') {
            steps {
                sh'''
                docker context ls
                rm -rf projectunix || true
                git clone https://github.com/adanmass/projectunix.git
                '''
            }
        }
        
        stage('compose down') {
            steps {
                sh '''
                   cd projectunix
                   docker ps -a
                   pwd
                   docker compose down -v
                '''
            }
        }
        
        stage('compose up') {
            steps {
                sh '''
                   cd projectunix
                   docker compose up -d
                '''
            }
        }
    }
}
