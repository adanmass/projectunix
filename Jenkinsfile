pipeline {
    agent any
    stages {
        stage('git clone') {
            steps {
                sh'''
                ls -l
                rm -rf projectunix || true
                git clone https://github.com/adanmass/projectunix.git
                '''
            }
        }
        
        stage('compose down') {
            steps {
                sh '''
                   cd unixproject
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
