export enum Position {
  BOTH = 'both',
  LEFT = 'left',
  NONE = 'none',
  RIGHT = 'right'
}

export interface Holder {
  position: Position;
}

export interface Product {
  bottomColor?: string;
  deskLegs?: boolean;
  mainColor?: string;
  phoneHolder?: string;
  tabletHolder?: string;
  ventHoles?: boolean;
  whiteboard?: string;
}