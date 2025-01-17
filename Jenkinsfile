pipeline {
    agent any
    stages {
        stage('git clone') {
            steps {
                sh'''
                ls -l
                rm -rf unix_project || true
                git clone https://github.com/adanmass/projectunix.git
                '''
            }
        }
        
        stage('compose down') {
            steps {
                sh '''
                   cd unix_project
                   docker ps -a
                   pwd
                   docker compose down -v
                '''
            }
        }
        
        stage('compose up') {
            steps {
                sh '''
                   cd unix_project
                   docker compose up -d
                '''
            }
        }
    }
}
