pos = [0, 0]
while Sair:

    for event in pygame.event.get():
        if event.type == pygame.QUIT: Sair=False

    if ballrect.left < 0 or ballrect.right > width:
        x = random.uniform(0.1, 1)
        speed[0] = x if speed[0] < 0.0 else -x 

    if ballrect.top < 0 or ballrect.bottom > height:
        x = random.uniform(0.1, 1)
        speed[1] = x if speed[1] < 0.0 else -x  

    pos[0] += speed[0]
    pos[1] += speed[1]
    ballrect.topleft = (int(pos[0]), int(pos[1]))

    screen.fill(black)
    screen.blit(ball, ballrect)
    pygame.display.flip()